/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strsplit.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/06/14 16:41:45 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/17 17:16:47 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

static int		ft_nbr_mots(const char *str, char c)
{
	int		i;
	int		mots;

	i = 0;
	mots = 0;
	while (str[i])
	{
		if (str[i] && str[i] == c)
			i++;
		while (str[i] != c && str[i])
			i++;
		if ((str[i] == c && str[i + 1] != c) || (!str[i]))
			mots++;
		if (str[i])
			i++;
	}
	return (mots);
}

static void		ft_size(const char *str, size_t *i, size_t *len, char c)
{
	while (str[*i] && str[*i] != c)
	{
		(*i)++;
		(*len)++;
	}
}

/*
** vars[0]: len
** vars[1]: j
** vars[2]: save
*/

static char		**ft_fill(char **tab, const char *str, char c)
{
	size_t	vars[4];

	vars[0] = 0;
	vars[1] = 0;
	vars[3] = 0;
	while (str[vars[3]])
	{
		while (str[vars[3]] && str[vars[3]] == c)
			vars[3]++;
		vars[2] = vars[3];
		ft_size(str, &vars[3], &vars[0], c);
		if ((!str[vars[3]] || str[vars[3]] == c) && vars[0] != 0)
		{
			if (!(tab[vars[1]] = malloc(sizeof(char) * (vars[0] + 1))))
				return (NULL);
			if (vars[2] != vars[0])
				tab[vars[1]] = ft_strsub(str, vars[2], vars[0]);
			vars[1]++;
			while (str[vars[3]] == c)
				vars[3]++;
		}
		vars[0] = 0;
	}
	tab[vars[1]] = NULL;
	return (tab);
}

char			**ft_strsplit(const char *str, char c)
{
	char	**tab;

	if (!str)
		return (NULL);
	if (!(tab = malloc(sizeof(char*) * (ft_nbr_mots(str, c) + 1))))
		return (NULL);
	tab = ft_fill(tab, str, c);
	return (tab);
}
