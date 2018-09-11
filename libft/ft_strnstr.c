/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strnstr.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/18 20:00:21 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/11 21:05:55 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strnstr(const char *str, const char *to_find, size_t l)
{
	size_t	i;
	size_t	j;

	i = 0;
	j = 0;
	if (!to_find[i])
		return ((char *)str);
	while (str[i])
	{
		while (str[i + j] == to_find[j] && i + j < l)
		{
			if (!to_find[j + 1])
				return ((char *)str + i);
			j++;
		}
		j = 0;
		i++;
	}
	return (NULL);
}
