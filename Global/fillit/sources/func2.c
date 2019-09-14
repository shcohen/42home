/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   func2.c                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: dchampag <marvin@42.fr>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/10/04 14:21:02 by dchampag          #+#    #+#             */
/*   Updated: 2018/10/04 14:21:03 by dchampag         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "fillit.h"

void	ft_putstr(char *str)
{
	write(1, str, ft_strlen(str));
}

char	*ft_strjoin(char const *s1, char const *s2)
{
	int		size;
	char	*res;
	int		i;

	i = 0;
	size = 0;
	if (s1 == NULL || s2 == NULL)
		return (NULL);
	size = ft_strlen((char*)s1);
	size += ft_strlen((char*)s2);
	if (NULL != (res = ft_strnew(size)))
	{
		while (*s1)
		{
			res[i++] = *s1;
			s1++;
		}
		while (*s2)
		{
			res[i++] = *s2;
			s2++;
		}
		return (res);
	}
	return (NULL);
}

int		ft_strlen(char *str)
{
	int	i;

	i = 0;
	while (*str++)
		i++;
	return (i);
}
