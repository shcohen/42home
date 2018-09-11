/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strsub.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/06/12 17:24:56 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/17 13:06:47 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strsub(const char *str, unsigned int start, size_t len)
{
	unsigned int	i;
	char			*pstr;

	i = 0;
	if (!str || !(pstr = malloc(sizeof(char) * (len + 1))))
		return (NULL);
	while (i < len)
	{
		pstr[i] = str[start + i];
		i++;
	}
	pstr[i] = '\0';
	return (pstr);
}
